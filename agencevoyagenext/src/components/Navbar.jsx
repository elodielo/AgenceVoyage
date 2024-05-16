"use client"

import './navbar.css'
// import { Dropdown } from 'bootstrap'

export default function Navbar(){
    return(
      <div>
        <div className=" fond d-flex justify-content-between">
            <img className='logo' src="logo.png" alt="logo" />
            <h2 className='m-4 p-4' > Le renard aux pieds d'Or</h2>
            <div className='nav m-2 p-2'>
        <a className='m-2 p-2 text-black' href="/"> Accueil </a>
        <a className='m-2 p-2 text-black'  href="/destinations"> destinations</a>
        <a className='m-2 p-2 text-black' href="/contact"> Contact</a>
        </div>
        </div>

        <nav class="responsiveNav navbar bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class=" fond offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/destinations">destinations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contact">contact</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

</div>


    )
}