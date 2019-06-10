import './style.styl';

define(['stickyfilljs'], (Stickyfill) => {
    const header = document.querySelector('.head');
    if(header)
        Stickyfill.add(header);
});