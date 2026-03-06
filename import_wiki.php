<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\WikiArticle;
use App\Models\WikiCategory;
use Illuminate\Support\Facades\DB;

$wikiPath = 'c:\Users\Zineb\SSD\ivao_wiki';
$indexFile = $wikiPath . '\index.json';

if (!file_exists($indexFile)) {
    echo "Index not found.\n";
    exit;
}

$books = json_decode(file_get_contents($indexFile), true);
$count = 0;
$catCount = 0;

foreach ($books as $sortOrder => $book) {
    if (!isset($book['url']))
        continue;
    $slugParts = explode('/', $book['url']);
    $bookSlug = end($slugParts);
    $bookIndexFile = $wikiPath . '\\' . $bookSlug . '\\_index.json';

    if (file_exists($bookIndexFile)) {
        $bookData = json_decode(file_get_contents($bookIndexFile), true);

        // Extract raw title (removing "Created X ago" metadata at the end)
        $rawTitle = preg_replace('/Created \d+ (month|year)s? ago.*/', '', $book['title']);
        $rawTitle = trim($rawTitle);

        $category = WikiCategory::updateOrCreate(
            ['slug' => $bookSlug],
            [
                'name' => ['fr' => $rawTitle, 'en' => $rawTitle],
                'sort_order' => $sortOrder
            ]
        );
        $catCount++;

        foreach ($bookData['pages'] as $page) {
            $pageSlugParts = explode('/', $page['url']);
            $pageSlug = end($pageSlugParts);

            $filePath = $wikiPath . '\\' . str_replace('ivao_wiki\\', '', $page['file']);

            if (file_exists($filePath)) {
                $content = file_get_contents($filePath);

                $frContent = '';
                $enContent = '';
                $frPos = strpos($content, '## Français');
                $enPos = strpos($content, '## English');

                if ($frPos !== false && $enPos !== false) {
                    $frContent = trim(substr($content, $frPos + 12, $enPos - ($frPos + 12)));
                    $frContent = str_replace('---', '', $frContent);
                    $enContent = trim(substr($content, $enPos + 10));
                } else {
                    $frContent = $content;
                    $enContent = $content;
                }

                WikiArticle::updateOrCreate(
                    ['slug' => $bookSlug . '-' . $pageSlug],
                    [
                        'category_id' => $category->id,
                        'title' => ['fr' => $page['title'], 'en' => $page['title']],
                        'content' => ['fr' => $frContent, 'en' => $enContent],
                        'is_published' => true
                    ]
                );
                $count++;
            }
        }
    }
}

echo "Successfully imported $catCount categories and $count wiki articles!\n";
