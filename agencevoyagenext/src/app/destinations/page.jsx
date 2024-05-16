"use client"

import Navbar from "@/components/Navbar"
import Tricase from "@/components/Tricase"
import BandeauPhotos from "@/components/includes/BandeauPhotos";
import Footer from "@/components/includes/footer";
import { useEffect, useState } from "react";

export default function Destinations(props)
{
    const [loading, setLoading] = useState(true); // État de chargement des données.
    const [error, setError] = useState(false); // État pour capturer une éventuelle erreur lors du fetch.
    const [data, setData] = useState(null); // Stockage des données reçues du fetch.
    const [filteredData, setFilteredData] = useState(null);
    const [filter, setFilter] = useState('');
    const [filterMoyen, setFilterMoyen] = useState('');
    const [filterDuree, setFilterDuree] = useState('');

    useEffect(() => {
        if (data) {
            const wip = data.filter((voyage) => voyage.endroit.pays.nom === filter);
            setFilteredData(wip);
        }
    }, [filter])

    useEffect(() => {
      if (data) {
          console.log(filterMoyen);
          const wap = data.filter((voyage) => voyage.modaliteTransport.nom === filterMoyen);
          setFilteredData(wap);
      }
  }, [filterMoyen])

  useEffect(() => {
    if (data) {
        const wip = data.filter((voyage) => voyage.nombreNuits === filterDuree);
        setFilteredData(wip);
    }
}, [filterDuree])
  
  
    useEffect(() => {
      // Déclenchement de la récupération des données de personnages au montage du composant.
      try {
        fetch("http://127.0.0.1:8000/api/voyage/tous" )
        // fetch("https://simplondevgrenoble.nohost.me/elodiel/agenceVoyage/public/api/voyage/tous")
          .then((response) => response.json()) // Transformation de la réponse en JSON.
          .then((data) => {
            setLoading(false); // Arrêt de l'indicateur de chargement après la réception des données.
            setData(data); // Enregistrement des données reçues dans l'état 'data'.
            setFilteredData(data)
          });
      } catch (error) {
        setError(true); // Enregistrement de l'erreur dans l'état 'error'.
        setLoading(false); // Arrêt de l'indicateur de chargement en cas d'erreur.
      }
    }, []); // Le tableau vide indique que cet effet ne s'exécute qu'au montage.
  
    return(
    <>
    <Navbar />
    {!loading && !error && data && (
        <>
    <Tricase data={data} data2={filteredData} setFilter={setFilter} setFilterMoyen={setFilterMoyen} setFilterDuree={setFilterDuree}/>
    <BandeauPhotos data={filteredData} /> </>)} 
    <Footer />
    </>
)
}