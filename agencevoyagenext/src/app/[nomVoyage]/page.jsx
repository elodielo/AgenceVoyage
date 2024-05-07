"use client";

import Navbar from "@/components/Navbar";
import Image from "next/image";
import { format, formatDate } from 'date-fns';
import { useEffect, useState } from "react";
import Footer from "@/components/includes/footer";
import Plaire from "@/components/includes/Plaire";


import './pageVoyage.css'
import FormulaireContact from "@/components/FormulaireContact";

export default function Voyage(props) {
  const [loading, setLoading] = useState(true); // État de chargement des données.
  const [error, setError] = useState(false); // État pour capturer une éventuelle erreur lors du fetch.
  const [data, setData] = useState(null); // Stockage des données reçues du fetch.

  useEffect(() => {
    // Déclenchement de la récupération des données de personnages au montage du composant.
    try {
      fetch("http://127.0.0.1:8000/api/voyage/" + props.params.nomVoyage)
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

  console.log(data);

  return (
    <div>
      <Navbar />
      {!loading && !error && data && (
        
      <div className="fondB p-5">
        <div class="d-flex justify-content-around">
        <Image width={200} height={200}
        src={"http://localhost:8000/images/" + data.endroit.lienImage}
      />
        <div id="infos">
          <p>{data.endroit.nom}</p>
          <p> {data.endroit.pays.nom}</p>
          <p>Nombre de nuits : {data.nombreNuits}</p>
        </div>
        <div>
        <button  className='btn btn-secondary'> contactez nous</button>
        </div>
        </div>
        <div class="d-flex justify-content-around p-5">
          <div> 
            <h5>Les nuits</h5>
            <p> en {data.modaliteNuit.nom}</p>
            <h5> Les repas </h5>
            <p>{data.repasCompris}</p>
            <h5> Transport à destination</h5>
            <p>{data.transportADestinationInclus}</p>
            <h5>Prix total</h5>
            <p>{data.prixTotal} euros </p>
          </div>
          <div>
            <FormulaireContact />
          </div>
        </div>
      </div>)}
      
      <Plaire />

      <Footer />
    </div>
  );
}
