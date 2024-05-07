"use client"

import './navbar.css'

export default function Navbar(){
    return(
        <div className="fond d-flex justify-content-between">
            <img className='logo' src="logo.png" alt="logo" />
            <h2 className='m-4 p-4' > Le renard aux pieds d'Or</h2>
            <div className='m-2 p-2'>
        <a className='m-2 p-2 text-black' href="/"> Accueil </a>
        <a className='m-2 p-2 text-black'  href="/destinations"> destinations</a>
        <a className='m-2 p-2 text-black' href="/contact"> Contact</a>
        </div>
        </div>
    )
}