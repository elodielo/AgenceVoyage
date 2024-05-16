"use client";

import React, { useState } from "react";
// import { useNavigate } from 'react-router-dom';

export default function FormulaireContactResa(props) {
  const [errorMessage, setErrorMessage] = useState(null);
  const [reussiteMessage, setReussiteMessage] = useState(null);
  const [formData, setFormData] = useState({
    nom: "",
    prenom: "",
    email: "",
    objet: "",
    commentaire: "",
  });

  const handleSubmit = async (event) => {
    event.preventDefault();
    try {
      const response = await fetch(
        // "https://simplondevgrenoble.nohost.me/elodiel/agenceVoyage/public/api/contactResa/new/" + props.data.nom,
        "http://127.0.0.1:8000/api/contactResa/new/" + props.data.nom,
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(formData),
        }
      );

      if (response.ok) {
        const data = await response.json();
        // redirect('/login')
        // navigate.push('/');
        setReussiteMessage("Le message a bien été envoyé");
      } else if (response.status === 422) {
        const errorData = await response.json();
        setErrorMessage(errorData.error);
      } else {
        throw new Error("Erreur lors de la soumission du formulaire");
      }
    } catch (error) {
      console.error("Erreur lors de l'envoi des données:", error);
      setErrorMessage("Une erreur est survenue lors de l'envoi du formulaire.");
    }
  };

  const handleChange = (event) => {
    const { id, value } = event.target;
    setFormData({ ...formData, [id]: value });
  };

  return (
    <div className="d-flex justify-content-center">
      <div className=" w-75 fond d-flex justify-content-center">
        <form onSubmit={handleSubmit} className="w-100 p-3" method="POST">
          {/* Champs de formulaire */}
          <div className="mb-3">
            <label htmlFor="nom" className="form-label">
              Nom
            </label>
            <input
              type="text"
              className="form-control"
              id="nom"
              value={formData.nom}
              onChange={handleChange}
            />
          </div>
          <div className="mb-3">
            <label htmlFor="prenom" className="form-label">
              Prénom
            </label>
            <input
              type="text"
              className="form-control"
              id="prenom"
              value={formData.prenom}
              onChange={handleChange}
            />
          </div>
          <div className="mb-3">
            <label htmlFor="email" className="form-label">
              Email
            </label>
            <input
              type="email"
              className="form-control"
              id="email"
              value={formData.email}
              onChange={handleChange}
            />
          </div>
          <div className="mb-3">
            <label htmlFor="objet" className="form-label">
              Objet du Message
            </label>
            <input
              type="text"
              className="form-control"
              id="objet"
              value={formData.objet}
              onChange={handleChange}
            />
          </div>
          <div className="mb-3">
            <label htmlFor="commentaire" className="form-label">
              Message
            </label>
            <textarea
              className="form-control"
              id="commentaire"
              rows="5"
              value={formData.commentaire}
              onChange={handleChange}
            ></textarea>
          </div>
          <div className="text-center">
            <button type="submit" className="btn btn-secondary">
              Envoyer
            </button>
          </div>
          {/* Affichage des erreurs */}
          {errorMessage && (
            <div className="alert alert-danger mt-3" role="alert">
              {errorMessage}
            </div>
          )}
          <>
            {reussiteMessage && (
              <div>
                <div className="alert alert-success mt-3" role="alert">
                  {reussiteMessage}
                </div>
                <a className="m-2 p-2 text-black" href="/">
                  {" "}
                  Accueil{" "}
                </a>
              </div>
            )}
          </>
        </form>
      </div>
    </div>
  );
}
