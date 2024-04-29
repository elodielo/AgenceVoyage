"use client"

import './footer.css'

export default function Footer(){
    return(
        <div className="footer d-flex justify-content-between">
        <p>brand</p>
        <div>
            <a className='m-2 p-2 text-black' href="">Nos engagements</a>
            <a className='m-2 p-2 text-black' href="">CGU et mentions légales</a>
        </div>
        </div>
    )
} 