"use client"

import './body.css'
import BandeauPhotos from "./BandeauPhotos"

export default function Body(){
    return(
        <div className="body">
        <h2>Destinations à vélo</h2>
        <BandeauPhotos />
        <h2> Les destinations locales </h2>
        <BandeauPhotos />
        </div>
    )
}