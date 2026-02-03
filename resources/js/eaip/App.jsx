// src/App.jsx
import React, { useState, useEffect, useCallback } from 'react';
import axios from 'axios';
import './App.css';
import logo from './MA.png';
import Map from './components/Map.jsx';
import AirportPanel from './components/AirportPanel.jsx';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faSearch, faSun, faMoon, faSync, faHome } from '@fortawesome/free-solid-svg-icons';

function App() {
  console.log('🎨 App component rendering');

  const [airports, setAirports] = useState([]);
  const [selectedAirport, setSelectedAirport] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);
  const [searchTerm, setSearchTerm] = useState('');
  const [darkMode, setDarkMode] = useState(false);

  const API_URL = ''; // Relative path since served by Laravel

  // Fetch all airports on component mount
  const fetchAirports = useCallback(async () => {
    try {
      setLoading(true);
      setError(null);
      console.log('Fetching airports from:', API_URL);

      const response = await axios.get(`${API_URL}/api/airports`, {
        timeout: 30000
      });

      if (response.data && response.data.success) {
        console.log(`✅ API Success: Loaded ${response.data.data?.length || 0} airports`);
        console.table(response.data.data?.slice(0, 5));
        setAirports(response.data.data || []);
      } else {
        console.error('❌ API returned success:false or malformed data', response.data);
        setError('Failed to load airports: Invalid server response');
      }
    } catch (err) {
      console.error('❌ Error fetching airports:', err);
      setError(err.message || 'Failed to load airports. Make sure the backend is running.');
    } finally {
      setLoading(false);
    }
  }, [API_URL]);

  useEffect(() => {
    console.log('🔄 fetchAirports useEffect triggered');
    fetchAirports();
  }, [fetchAirports]);

  // Filter airports by search term
  const filteredAirports = airports.filter(airport => {
    const searchLower = searchTerm.toLowerCase();

    // Helper to extract searchable string from modern JSON objects or legacy strings
    const getSearchable = (val) => {
      if (!val) return '';
      if (typeof val === 'object') {
        return (val.en || Object.values(val)[0] || '').toLowerCase();
      }
      return String(val).toLowerCase();
    };

    return (
      (airport.icao?.toLowerCase() || '').includes(searchLower) ||
      (airport.iata?.toLowerCase() || '').includes(searchLower) ||
      getSearchable(airport.name).includes(searchLower) ||
      getSearchable(airport.city).includes(searchLower)
    );
  });

  // Handle airport selection
  const handleAirportSelect = (airport) => {
    setSelectedAirport(airport);
  };

  // Handle airport close
  const handleClosePanel = () => {
    setSelectedAirport(null);
  };

  // Toggle dark mode
  const toggleDarkMode = () => {
    setDarkMode(!darkMode);
  };

  return (
    <div className={`app ${darkMode ? 'dark-mode' : 'light-mode'}`} style={{ height: '100%', width: '100%', display: 'flex', flexDirection: 'column', position: 'relative' }}>
      {/* App-wide Loading Progress Bar (Top) - Only during refresh */}
      {loading && !!airports.length && (
        <div className="app-loading-bar-container">
          <div className="app-loading-bar"></div>
        </div>
      )}

      {/* Initial Loading Screen (Enhanced) */}
      {loading && !airports.length && (
        <div className="enhanced-loading-screen">
          <div className="loading-logo-pulse">
            <img src={logo} alt="IVAO Morocco" className="loading-logo" />
          </div>
          <div className="loading-text">vAIP MOROCCO</div>
          <div className="loading-subtext">MA AIRSPACE INITIALIZATION</div>
        </div>
      )}

      {/* Top Floating Toolbar */}
      <div className="absolute top-4 right-4 z-[1000] flex items-center gap-3 pointer-events-auto">
        {/* Search Bar */}
        <div className="relative group">
          <div className="absolute left-3 top-1/2 -translate-y-1/2 text-muted transition-colors">
            <FontAwesomeIcon icon={faSearch} size="sm" />
          </div>
          <input
            type="text"
            placeholder="Search airport..."
            value={searchTerm}
            onChange={(e) => setSearchTerm(e.target.value)}
            className="search-input w-64 pl-10 pr-4 py-2.5 rounded-xl shadow-2xl transition-all font-medium text-sm"
          />
        </div>

        {/* Action Buttons */}
        <div className="flex action-buttons-group p-1 rounded-xl shadow-2xl">
          <button
            className="toolbar-btn w-10 h-10 flex items-center justify-center rounded-lg transition-all"
            onClick={toggleDarkMode}
            title="Toggle Map Theme"
          >
            <FontAwesomeIcon icon={darkMode ? faSun : faMoon} />
          </button>

          <button
            className="toolbar-btn w-10 h-10 flex items-center justify-center rounded-lg transition-all"
            onClick={fetchAirports}
            disabled={loading}
            title="Refresh Data"
          >
            <FontAwesomeIcon icon={faSync} spin={loading} />
          </button>
        </div>
      </div>

      {/* Error Message */}
      {error && (
        <div className="absolute top-20 left-1/2 transform -translate-x-1/2 z-[999] bg-red-500 text-white px-6 py-3 rounded shadow-lg flex items-center gap-2">
          ⚠️ {error}
          <button onClick={() => setError(null)} className="ml-2 font-bold">×</button>
        </div>
      )}

      <div style={{ flex: 1, display: 'flex', flexDirection: 'column', position: 'relative', width: '100%', height: '100%', minHeight: '500px' }}>
        {/* Map */}
        <Map
          airports={filteredAirports}
          selectedAirport={selectedAirport}
          onAirportSelect={handleAirportSelect}
          darkMode={darkMode}
          showFIR={false}
        />

        {/* Airport Info Panel */}
        {selectedAirport && (
          <AirportPanel
            airport={selectedAirport}
            onClose={handleClosePanel}
            darkMode={darkMode}
          />
        )}
      </div>
    </div>
  );
}

export default App;