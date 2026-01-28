import './bootstrap';

const modal = document.getElementById('movieModal')
const modalContent = document.getElementById('modalContent')
const posters = document.querySelectorAll('.poster-box')
const close = document.querySelector('.close');
let movieId = null

posters.forEach(card => {
    card.addEventListener('click', function() {
        movieId = this.dataset.movieId;
        console.log(movieId)
        openModal(movieId)
    })
})

close.addEventListener('click', function() {
    closeModal()
})

const openModal = async(id) => {
    const response = await fetch(`/${id}`);
    const data = await response.json()

    modalContent.innerHTML = '';

    modalContent.innerHTML += `
         <div class="modal-img">
            <img src="${data.image}" alt="">
         </div>
         <div class="modal-text">
            <h2>${data.name}</h2>
            <p class="description">${data.description}</p>
             <div id="genre" class="genre-block"> </div>
             <div id="session" class="poster-session"></div>
         </div>
    `
    console.log(data)

    const genreBlock = document.getElementById('genre')
    const sessionBlock = document.getElementById('session')

    data.genres.forEach(genre => {
        genreBlock.innerHTML += `
             <div class="genre">
                 <p>${genre.name}</p>
             </div>
        `
    })

    data.sessions.forEach(session => {
        console.log(session.time)
        sessionBlock.innerHTML += `
         <div class="session-item">
             <div class="time">
                 <h3>${session.time}</h3>
               </div>
             <div class="price">
                <p>${session.format}</p>
                <p>${session.price} ₸</p>
             </div>
             <div class="hall">
                <p>Зал ${session.hall}</p>
             </div>
         </div>
        `
    })

    genreBlock.innerHTML += `

    `

    modal.style.display = 'block';
}

const closeModal = () => {

    document.getElementById('movieModal').style.display = 'none';
}
