"use client";

import Navbar from "@/components/Navbar";
import Image from "next/image";

export default function Voyage() {
  return (
    <div>
      <Navbar />
      <div>
        <div class="d-flex justify-content-around">
       <p> Image</p> {/* <Image>  </Image> */}
        <div id="infos">
          <p>Lieu</p>
          <p> Pays</p>
          <p>NbrJour et nbrNuits</p>
        </div>
        <button> contactez nous</button>
        </div>
        <div class="d-flex justify-content-evenly">
          <div> Info</div>
          <div>Formulaire</div>
        </div>
      </div>
    </div>
  );
}
