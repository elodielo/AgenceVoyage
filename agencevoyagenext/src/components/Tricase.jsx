"use client";

import { Dropdown } from "bootstrap";
import Voyages from "./Voyages";

export default function Tricase(props) {
  console.log(props.data)
  const paysDejaNotes = [];
  const transportDejaNotés = [];
  const DureeDejaNotee = [];

  return (
    <div>
      <div className="d-flex justify-content-between p-5">
        <p>{props.data.length} destinations</p>
        <div id="casesTri" className="d-flex ">
          <div class="dropdown">
            <a
              class="btn btn-secondary dropdown-toggle"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Pays
            </a>

    <ul className='dropdown-menu'>
      {props.data.map((voyage) => (
        !paysDejaNotes.includes(voyage.endroit.pays.nom) &&
        <li onClick={() => props.setFilter(voyage.endroit.pays.nom)}>
          <p className="dropdown-item">
            {voyage.endroit.pays.nom}
          </p>
          {paysDejaNotes.push(voyage.endroit.pays.nom)}
        </li>
      ))}
    </ul>
          </div>
          <div class="dropdown">
            <a
              class="btn btn-secondary dropdown-toggle"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Activités
            </a>

            <ul className='dropdown-menu'>
      {props.data.map((voyage) => (
        !transportDejaNotés.includes(voyage.modaliteTransport.nom) &&
        <li onClick={() => props.setFilter(voyage.modaliteTransport.nom)}>
          <p className="dropdown-item" >
            {voyage.modaliteTransport.nom}
          </p>
          {transportDejaNotés.push(voyage.modaliteTransport.nom)}
        </li>
      ))}
    </ul>


          </div>
          <div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Durée
  </a>

  <ul class="dropdown-menu">
  {props.data.map((voyage) => (
        !DureeDejaNotee.includes(voyage.nombreNuits) &&
        <li >
          <a className="dropdown-item" href="#">
            {voyage.nombreNuits} nuits
          </a>
          {DureeDejaNotee.push(voyage.nombreNuits)}
        </li>
      ))}
    </ul>
</div>
        </div>
      </div>
      {/* <Voyages /> */}
    </div>
  );
}
