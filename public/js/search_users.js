const search_form = document.forms['header-search'];
const section = document.querySelector('section');
const search_users_endp = BASE_URL + "searchusers/";
const followers_endp = BASE_URL + "followers/";
const article = document.querySelector('article');
let offset = 0;
let searchedAgain = false;
let searched;
const limit = 9;
const img_add_ref_list = [];

if (search_form)
    search_form.addEventListener('submit', research);

function research(event){
    event.preventDefault();

    offset = 0;

    const search_box = search_form['user-search'];
    search_box.classList.remove('wrong');
    const toSearch = encodeURIComponent(search_box.value.trim());

    const found = document.getElementById('search-info');
    found.textContent = "Sto cercando...";

    searched = toSearch;

    removeSearchAgainButton();

    section.id = "found-users";
    if (offset === 0)
        section.innerHTML = "";
    if (!toSearch){
        found.textContent = "Inserisci un nome utente da cercare!";
        search_box.classList.add('wrong');
        return;
    }
    
    fetch(search_users_endp + "like/" + toSearch + "/" + limit + "/" + offset).then(onResp).then(onUsers);
}

function researchAgain(event){
    searchedAgain = true;
    offset = offset + limit;
    
    fetch(search_users_endp + "like/" + searched + "/" + limit + "/" + offset).then(onResp).then(onUsers);
}

function onResp(response){
    return response.json();
}

function removeSearchAgainButton(){
    const search_again = document.querySelector('#search-again');
        
    if (search_again !== null)
        search_again.remove();
}

function onUsers(json){
    removeSearchAgainButton()
    const found = document.getElementById('search-info');

    if (json.length === 0 && !searchedAgain){
        found.textContent = "Nessun utente trovato :(";
        return;
    }
    found.textContent = "Ecco cos'ho trovato:";        
        for(let userdata of json){
            
            const sheet = document.createElement('div'); 
            sheet.classList.add('sheet');
            
    
            const violin_key = document.createElement('a');
            violin_key.classList.add('violin-key');
            violin_key.href = BASE_URL + "user_profile/" + userdata.username;
    
            const bass_key = document.createElement('div');
            bass_key.classList.add('bass-key');
    
            const pic_container = document.createElement('div');
            pic_container.classList.add('pic-container');
    
            const add_friend = document.createElement('div');
            add_friend.classList.add('add-friend');
    
            const propic = document.createElement('img');
            propic.classList.add('propic');
            
            const username = document.createElement('h5');
            const img_trebdark = document.createElement('img');
            const img_treblight = document.createElement('img');
            const img_add = document.createElement('img');
            
            section.appendChild(sheet);
            sheet.appendChild(violin_key);
            sheet.appendChild(bass_key);
            
            img_trebdark.src = BASE_URL + "images/svgicons/treble_dark.svg";
            violin_key.appendChild(img_trebdark);
            violin_key.appendChild(pic_container);

            img_treblight.src = BASE_URL + "images/svgicons/treble_light.svg";
            bass_key.appendChild(img_treblight);
            bass_key.appendChild(add_friend);

            propic.src = userdata.propic;
            pic_container.appendChild(propic);

            username.textContent = userdata.username;
            add_friend.appendChild(username);
            
            if (userdata.follows === null){
                img_add.src = BASE_URL + "images/svgicons/add_user.svg";
                img_add.addEventListener('click', addFollow);
            }
            else{
                img_add.src = BASE_URL + "images/svgicons/user_added.svg";
                img_add.addEventListener('click', removeFollow);
            }


            add_friend.appendChild(img_add);

            img_add.dataset.user = userdata.username; 
        }

    if (json.length === limit){
        const search_again = createSearchAgainButton()
        article.appendChild(search_again);

        if (searched)
            search_again.addEventListener("click", researchAgain);
        
    }
    searchedAgain = false;
    
}

function createSearchAgainButton(){

    const search_again = document.createElement('div');
    search_again.id = "search-again";
    search_again.textContent = "...";
    search_again.href = "";
    return search_again;
}

function removeFollow(event){
    event.currentTarget.src = BASE_URL + "images/svgicons/add_user.svg";
    const targetuser = event.currentTarget.dataset.user;
    fetch(followers_endp + "unfollow/" + targetuser);
    event.currentTarget.removeEventListener('click', removeFollow);
    event.currentTarget.addEventListener('click', addFollow);

}

function addFollow(event){
    event.currentTarget.src = BASE_URL + "images/svgicons/user_added.svg";
    const targetuser = event.currentTarget.dataset.user;
    fetch(followers_endp + "follow/" + targetuser);
    event.currentTarget.removeEventListener('click', addFollow);
    event.currentTarget.addEventListener('click', removeFollow);
}
