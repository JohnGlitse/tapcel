import './bootstrap';

const banner = document.getElementsByClassName('banner')[0];
let slide = document.getElementsByClassName('slide');
const arrowLeft = document.querySelector('.fa-chevron-left');
const arrowRight = document.querySelector('.fa-chevron-right');
const arrows = document.querySelector('.arrows');
let index = 1;
let interval = 3000;

if(banner && slide.length > 0){
const firstNode = slide[0].cloneNode(true);
const secondNode = slide[slide.length - 1].cloneNode(true);

banner.append(firstNode);
banner.prepend(secondNode);
firstNode.id = 'first-node';
secondNode.id = 'second-node';

const clientWidth = slide[index].clientWidth;
//banner.style.transform = `translate(${-clientWidth * index}px)`;

const startSlide = () => {
    setInterval(()=>{
        index++;
        if(index === slide.length){
            index = 1;
        }
        banner.style.transform = `translate(${-clientWidth * index}px)`;
        banner.style.transition = '0.8s'
    }, interval);
}

        banner.addEventListener('transitionend', ()=>{
            slide = document.querySelectorAll('.slide')
        if (slide[index].id === firstNode.id) {
            banner.style.transition = 'none'
            index = 1
            banner.style.transform = `translate(${-clientWidth * index}px)`  
        }

        });

        
        banner.addEventListener('mouseover', () =>{
            arrows.style.display = 'flex';
        });
        banner.addEventListener('mouseout', () =>{
            arrows.style.display = 'none';
        });

        arrowRight.addEventListener('click', () =>{
            if(index >= slide.length - 1 ) return;
            index++;
        
            banner.style.transform = `translate(${-clientWidth * index}px)`  
        });

        arrowLeft.addEventListener('click', ()=>{
            if(index <= 0) return;
            index--;
            banner.style.transform = `translate(${-clientWidth * index}px)`
        });


startSlide();
        }

 
//// CODE FOR DISPLAYING MENU ITEMS ON MOBILE DEVICES

const navbar = document.getElementsByTagName('nav')[0];
const bars = document.getElementsByClassName('fa-bars')[0];
 
// if(bars && navbar.length > 0){
    bars.addEventListener('click', ()=>{
    navbar.classList.toggle('active');
});
// }

 




