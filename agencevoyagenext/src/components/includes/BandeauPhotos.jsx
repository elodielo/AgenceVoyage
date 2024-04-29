"use client"

import './bandeauPhotos.css'

export default function BandeauPhotos() {
    const nombreDePhotos = Array.from({ length: 6 });
  
    return (
      <div className='d-flex justify-content-around'>
        {nombreDePhotos.map((_, index) => (
          <div key={index} className="boitePhoto"></div>
        ))}
      </div>
    );
  }
  