// src/components/Map.js
import React, { useEffect, useRef } from 'react';
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import './Map.css';

import iconRetinaUrl from 'leaflet/dist/images/marker-icon-2x.png';
import iconUrl from 'leaflet/dist/images/marker-icon.png';
import shadowUrl from 'leaflet/dist/images/marker-shadow.png';

// Fix Leaflet icon issue
delete L.Icon.Default.prototype._getIconUrl;
L.Icon.Default.mergeOptions({
  iconRetinaUrl: iconRetinaUrl,
  iconUrl: iconUrl,
  shadowUrl: shadowUrl,
});

function Map({ airports, selectedAirport, onAirportSelect, darkMode }) {
  console.log('🗺️ Map component rendering, airports count:', airports?.length || 0);

  // Helper to extract display string from modern JSON objects or legacy strings
  const getDisplayString = (val) => {
    if (!val) return '';
    if (typeof val === 'object') {
      return val.en || Object.values(val)[0] || '';
    }
    return String(val);
  };

  const mapContainer = useRef(null);
  const map = useRef(null);
  const markersRef = useRef({});

  // Initialize map
  useEffect(() => {
    console.log('🗺️ Map useEffect - Initialize, mapContainer:', mapContainer.current);
    if (!mapContainer.current) return;

    // Create map centered on Morocco (zoomControl: false because we'll add it ourselves in a better position)
    const mapInstance = L.map(mapContainer.current, { zoomControl: false }).setView([31.7917, -7.0926], 6);
    map.current = mapInstance;

    // Add zoom control manually at bottom-right
    L.control.zoom({ position: 'bottomright' }).addTo(mapInstance);

    // Add tile layer
    const tileUrl = darkMode
      ? 'https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png'
      : 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';

    const attribution = darkMode
      ? '© CartoDB contributors'
      : '© OpenStreetMap contributors';

    L.tileLayer(tileUrl, {
      attribution: attribution,
      maxZoom: 19,
    }).addTo(mapInstance);

    // Ensure map handles container size correctly - sometimes needs a bit longer if layout is still shifting
    const resizeTimer = setTimeout(() => {
      if (map.current) {
        console.log('🗺️ Map invalidating size');
        map.current.invalidateSize();
      }
    }, 500);

    return () => {
      clearTimeout(resizeTimer);
      if (map.current) {
        console.log('🗺️ Map cleanup');
        map.current.remove();
        map.current = null;
      }
    };
  }, [darkMode]);

  // Add/update airport markers
  useEffect(() => {
    if (!map.current) return;

    console.log(`🗺️ Adding ${airports.length} markers to map`);

    // Clear existing markers
    if (map.current.markersGroup) {
      map.current.removeLayer(map.current.markersGroup);
    }

    const markersGroup = L.layerGroup();
    map.current.markersGroup = markersGroup;
    markersGroup.addTo(map.current);

    markersRef.current = {};

    // Add new markers
    airports.forEach(airport => {
      const lat = parseFloat(airport?.latitude);
      const lon = parseFloat(airport?.longitude);

      // Skip airports with invalid coordinates
      if (isNaN(lat) || isNaN(lon)) {
        console.warn(`Map: skipping ${airport?.icao} - invalid coordinates:`, airport?.latitude, airport?.longitude);
        return;
      }

      console.log(`📍 Creating marker for ${airport.icao} at [${lat}, ${lon}]`);

      const isSelected = selectedAirport?.icao === airport.icao;

      // Determine airport size class
      const sizeClass = airport.type === 'large_airport' ? 'large' :
        airport.type === 'medium_airport' ? 'medium' : 'small';

      const markerIcon = L.divIcon({
        className: `custom-marker ${isSelected ? 'selected' : ''}`,
        html: `
          <div class="marker-dot ${sizeClass}"></div>
        `,
        iconSize: [34, 34],
        iconAnchor: [17, 17],
        popupAnchor: [0, -18],
      });

      const marker = L.marker([lat, lon], {
        icon: markerIcon,
        title: getDisplayString(airport.name),
        zIndexOffset: isSelected ? 1000 : 0
      })
        .bindPopup(`
          <div class="airport-popup">
            <strong>${airport.icao}</strong> ${airport.iata ? `(${airport.iata})` : ''}<br>
            ${getDisplayString(airport.name)}<br>
            <small>${getDisplayString(airport.city)}</small>
          </div>
        `)
        .on('click', () => {
          onAirportSelect(airport);
        });

      markersGroup.addLayer(marker);
      markersRef.current[airport.icao] = marker;
    });

    console.log(`✅ Finished adding ${Object.keys(markersRef.current).length} markers`);
  }, [airports, selectedAirport, onAirportSelect]);

  // Highlight selected airport
  useEffect(() => {
    if (!map.current || !selectedAirport) return;

    const lat = Number(selectedAirport?.latitude);
    const lon = Number(selectedAirport?.longitude);

    if (!isFinite(lat) || !isFinite(lon)) {
      console.warn('Map: selected airport has invalid coordinates, cannot pan/open popup', selectedAirport);
      return;
    }

    // Pan to selected airport
    map.current.setView([lat, lon], 12);

    // Open popup
    const marker = markersRef.current[selectedAirport.icao];
    if (marker) {
      marker.openPopup();
    }
  }, [selectedAirport]);

  // Add/remove FIR boundary based on IVAO status


  return (
    <div className="map-container">
      <div ref={mapContainer} className="map" />

      {/* Map Legend */}
      <div className="map-legend">
        <h4>Airport Types</h4>
        <div className="legend-item">
          <div className="legend-icon large"></div>
          <span>Large Airport</span>
        </div>
        <div className="legend-item">
          <div className="legend-icon medium"></div>
          <span>Medium Airport</span>
        </div>
        <div className="legend-item">
          <div className="legend-icon small"></div>
          <span>Small Airport</span>
        </div>
        <div className="legend-item">
          <div className="legend-icon selected"></div>
          <span>Selected</span>
        </div>
      </div>
    </div>
  );
}

export default Map;