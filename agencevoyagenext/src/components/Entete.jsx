"use client"

import './entete.css'

export default function Entete()
{
    return(
        <div className='entete'>
        <h4 className='text-center p-5'>Un voyage de mille lieues commence toujours par un premier pas"</h4>
        <h5 className='text-end pe-5'>Lao Tseu</h5>
        <div className='d-grid gap-2 d-md-flex justify-content-md-end p-4'>
        <a href="/contact"><button className='boutonContact btn me-md-2'> Contact  </button></a>
        </div>
        </div>
    )
}