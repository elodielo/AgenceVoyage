"use client"

import Link from 'next/link';
import './bandeauPhotos.css'
import Image from 'next/image';
import { useEffect, useState } from "react";

export default function BandeauPhotos() {
  const [loading, setLoading] = useState(true); // État de chargement des données.
  const [error, setError] = useState(false); // État pour capturer une éventuelle erreur lors du fetch.
  const [data, setData] = useState(null); // Stockage des données reçues du fetch.

  useEffect(() => {
    // Déclenchement de la récupération des données de personnages au montage du composant.
    try {
      // fetch("https://simplondevgrenoble.nohost.me/elodiel/agenceVoyage/public/api/voyage/triPays")
      fetch("http://127.0.0.1:8000/api/voyage/triPays")
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

  


  return(
    <div className='p-2'>
  <h2>Destinations locales</h2>
  <div  >
  {!loading && !error && data && (
  <ul className='d-flex flex-row justify-content-evenly flex-wrap'>
    {data.map((voyage, index) => (
    <Link className=' link-unstyled list-unstyled text-center' key={index} href={"/" + voyage.nom}>
      <li className='p-2 m-2 border border-3 rounded'>
        <p> {voyage.nom}</p>
        <p class="fst-italic"> {voyage.endroit.nom}</p>
        <Image width={200} height={200}
        src={"http://localhost:8000/images/" + voyage.endroit.lienImage}
      />
      </li>
      </Link>
    ))}
  </ul>)}
</div>
<div className='d-flex justify-content-center'>
<Link  href='/destinations'>
<button className='btn btn-secondary m-5 '> voir plus </button>
</Link>
</div>
</div>
 
    );
  }
  
