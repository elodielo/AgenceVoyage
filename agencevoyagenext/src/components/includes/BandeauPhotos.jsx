"use client"

import Link from 'next/link';
import './bandeauPhotos.css'
import Image from 'next/image';

export default function BandeauPhotos(props) {
  console.log(props.data[1])
  let data = props.data;
  console.log(data)
  // console.log(props.data[0].nom)
  // props.data.forEach(dat => {
  //   console.log(dat);
  // });
  return(
    <div>
  <h1>Liste des voyages</h1>
  <div  >
  <ul className='d-flex flex-wrap flex-row justify-content-evenly'>
    {props.data.map((voyage, index) => (
      <li key={index}>
        <p>Nom du voyage : {voyage.nom}</p>
        <p>Prix total : {voyage.prixTotal}</p>
        <Image width={200} height={200}
        src={"http://localhost:8000/images/" + voyage.endroit.lienImage}
      />
        {/* <p> image:"http://127.0.0.1:8000/images/" +{voyage.endroit.lienImage} </p> */}
      </li>
    ))}
  </ul>
</div>
</div>
    // console.log(props.data)
    );
  }
  
  /* {nombreDePhotos.map((_, index) => ( */
  // return (
    // <div className='d-flex justify-content-around'>
    //   {props.data.map((voyage, index) =>(
    //    <Link href= {'/' + voyage.name}>
    //     <div key={index} className="boitePhoto"></div>
    //     </Link>
      // ))}
    // </div>