"use client"

import Link from 'next/link';
import './bandeauPhotos.css'
import Image from 'next/image';

export default function BandeauPhotos(props) {
  console.log(props.data[1])
  let data = props.data;
  console.log(data)

  return(
    <div className='p-2'>
  {/* <h2 className='p-3'>Destinations proposées</h2> */}
  <div  >
  <ul className='d-flex flex-wrap flex-row justify-content-evenly'>
    {props.data.map((voyage, index) => (
     <Link className='link-unstyled list-unstyled text-center'  key={index} href={"/" + voyage.nom}>
      <li>
        <p> {voyage.nom}</p>
        <p> {voyage.endroit.nom}</p>
        <Image width={200} height={200}
        src={"http://localhost:8000/images/" + voyage.endroit.lienImage}
      />
        {/* <p> image:"http://127.0.0.1:8000/images/" +{voyage.endroit.lienImage} </p> */}
      </li> 
      </Link>
    ))}
  </ul>
</div>
<div className='d-flex justify-content-center'>
    <Link href='/destinations'>
    <button  className='btn btn-secondary'> voir plus </button>
   </Link> 
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