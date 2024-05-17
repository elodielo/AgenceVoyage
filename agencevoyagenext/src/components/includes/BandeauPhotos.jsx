"use client";

import Link from "next/link";
import "./bandeauPhotos.css";
import Image from "next/image";

export default function BandeauPhotos(props) {
  let data = props.data;

  return (
    <div className="body p-2">
      <div>
        <ul className="d-flex flex-wrap flex-row justify-content-evenly">
          {props.data
            .sort(() => 0.5 - Math.random())
            .slice(0, 12)
            .map((voyage, index) => (
              <Link
                className="link-unstyled list-unstyled text-center"
                key={index}
                href={"/" + voyage.nom}
              >
                <li className="p-2 m-2 border border-3 rounded">
                  <p> {voyage.nom}</p>
                  <p class="fst-italic"> {voyage.endroit.nom}</p>
                  <Image
                    width={200}
                    height={200}
                    src={
                      "http://localhost:8000/images/" + voyage.endroit.lienImage
                    }
                  />
                </li>
              </Link>
            ))}
        </ul>
      </div>
      <div className="d-flex justify-content-center">
        <Link href="/destinations">
          <button className="btn btn-secondary"> voir plus </button>
        </Link>
      </div>
    </div>
  );
}

