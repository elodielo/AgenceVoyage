"use client"

import FormulaireContact from "@/components/FormulaireContact"
import Navbar from "@/components/Navbar"
import Footer from "@/components/includes/footer"

export default function Contact()
{
    return(
        <div>
        <Navbar />
        <div className="body text-center">
        <h3 className="p-3"> Nous sommes ici pour répondre à toutes vos questions</h3>
        </div>
        <FormulaireContact />
        <Footer />
        </div>
    )
}