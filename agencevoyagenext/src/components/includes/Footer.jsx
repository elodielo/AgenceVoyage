"use client";

import Image from "next/image";
import "./footer.css";

export default function Footer() {
  return (
    <div className="footer d-flex justify-content-between">
      <div className="d-flex">
        <Image width={100} height={50} src="/renard.png" />
        <p>Fox travel</p>
      </div>
      <div>
        <a className="m-2 p-2 text-black" href="">
          Nos engagements
        </a>
        <a className="m-2 p-2 text-black" href="">
          CGU et mentions légales
        </a>
      </div>
    </div>
  );
}
