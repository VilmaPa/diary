require('./bootstrap');

//reikia evento, kuris pasakytu kada baigesi krovimas
window.addEventListener('DOMContentLoaded', () => {
    
    //is ID pavadinima ikeliam su #
        if(document.querySelector('#students-list')){
            console.log('DOM fully loaded and parsed');
    //toliau esancios reikalingos jei yra sortinimas indexe paspaudus ant linko
    //         document.querySelectorAll('[data-sort]').forEach(a => {
    //             a.addEventListener('click', e => {
    //                 e.preventDefault();  //kad eventas neitu linku
    
    //                 // console.log(a.dataset.sort);
    //                 console.log(sortUrl);
    //                 //ikopinam kad veiktu axies, app.blade.js
    //                 axios.get(sortUrl+a.dataset.sort)
    //                 .then(function (response) {
    //                     // handle success
    //                     console.log(response.data.list);
    //                     document.querySelector('#students-list').innerHTML = response.data.list;
    //                 })
    //                 .catch(function (error) {
    //                     // handle error
    //                     console.log(error);
    //                 })
    //       });
    // })    
      }
    });