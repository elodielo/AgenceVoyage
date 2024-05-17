"use client";

import Navbar from "@/components/Navbar";
import Image from "next/image";
import { format, formatDate } from "date-fns";
import { useEffect, useState } from "react";
import Footer from "@/components/includes/footer";
import Plaire from "@/components/includes/Plaire";

import "./pageVoyage.css";
import FormulaireContactResa from "@/components/FormulaireContactResa";

export default function Voyage(props) {
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(false);
  const [data, setData] = useState(null);

  useEffect(() => {
    try {
      fetch("http://127.0.0.1:8000/api/voyage/" + props.params.nomVoyage)
        .then((response) => response.json())
        .then((data) => {
          setLoading(false);
          setData(data);
        });
    } catch (error) {
      setError(true);
      setLoading(false);
    }
  }, []);

  return (
    <div>
      <Navbar />
      {!loading && !error && data && (
        <div className="fondB p-5">
          <div class="d-flex justify-content-around">
            <Image
              width={250}
              height={250}
              src={"http://localhost:8000/images/" + data.endroit.lienImage}
            />
            <div id="infos">
              <p class="fs-2">{data.endroit.nom}</p>
              <p> {data.endroit.pays.nom}</p>
              <p> {data.nombreNuits} nuits </p>
            </div>
            {/* <div>
        <button  className='btn btn-secondary'> contactez nous</button>
        </div> */}
          </div>
          <div class="espace d-flex justify-content-between p-5">
            <div class="w-100 p-3 border border-info">
              <h5 className="p-2">Les nuits</h5>
              <p> en {data.modaliteNuit.nom}</p>
              <h5 className="p-2"> Les repas sont compris </h5>
              <p>{data.repasCompris ? "oui" : "non"}</p>
              <h5 className="p-2"> Transport à destination inclus</h5>

              <p>{data.transportADestinationInclus ? "oui" : "non"}</p>
              <h5 className="p-2">Prix total</h5>
              <p>{data.prixTotal} euros </p>
            </div>
            <div class="w-100">
              <FormulaireContactResa data={data} />
            </div>
          </div>
        </div>
      )}

      <Plaire />

      <Footer />
    </div>
  );
}
