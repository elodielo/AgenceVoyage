"use client";

import "./body.css";
import BandeauPhotos from "./BandeauPhotos";
import { useEffect, useState } from "react";
// import fetch from 'cross-fetch';

export default function Body() {
  // fetch('http://127.0.0.1:8000/api/voyage/show').then((response) => {
  //   console.log(response.json())
  // })
  const [loading, setLoading] = useState(true); // État de chargement des données.
  const [error, setError] = useState(false); // État pour capturer une éventuelle erreur lors du fetch.
  const [data, setData] = useState(null); // Stockage des données reçues du fetch.

  useEffect(() => {
    // Déclenchement de la récupération des données de personnages au montage du composant.
    try {
      fetch("http://127.0.0.1:8000/api/voyage/tous")
        .then((response) => response.json()) // Transformation de la réponse en JSON.
        .then((data) => {
          setLoading(false); // Arrêt de l'indicateur de chargement après la réception des données.
          setData(data); // Enregistrement des données reçues dans l'état 'data'.
        });
    } catch (error) {
      setError(true); // Enregistrement de l'erreur dans l'état 'error'.
      setLoading(false); // Arrêt de l'indicateur de chargement en cas d'erreur.
    }
  }, []); // Le tableau vide indique que cet effet ne s'exécute qu'au montage.

  return (
    <>
      {!loading && !error && data && (
        <div className="body">
          <h2>Destinations à vélo</h2>
          <BandeauPhotos data={data} />
          <h2> Les destinations locales </h2>
          {/* <BandeauPhotos2 /> */}
        </div>
      )}
    </>
  );
}
