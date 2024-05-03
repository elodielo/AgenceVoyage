"use client";

export default function FormulaireContact() {
  return (
    <div className="d-flex justify-content-center">
        <div className='m-5 w-75 p-3 fond d-flex justify-content-center'>
        <form className="w-50 p-3">
          <div className="mb-3">
            <label htmlFor="nom" className="form-label">Nom</label>
            <input type="text" className="form-control" id="nom" />
          </div>
          <div className="mb-3">
            <label htmlFor="prenom" className="form-label">Prénom</label>
            <input type="text" className="form-control" id="prenom" />
          </div>
          <div className="mb-3">
            <label htmlFor="email" className="form-label">Email</label>
            <input type="email" className="form-control" id="email" />
          </div>
          <div className="mb-3">
            <label htmlFor="objet" className="form-label">Objet du Message</label>
            <input type="text" className="form-control" id="objet" />
          </div>
          <div className="mb-3">
            <label htmlFor="message" className="form-label">Message</label>
            <textarea className="form-control" id="message" rows="5"></textarea>
          </div>
          <div className="text-center"> 
        <button type="submit" className="btn btn-secondary">Envoyer</button>
      </div>        </form>
        </div>
        </div>
      );
}
