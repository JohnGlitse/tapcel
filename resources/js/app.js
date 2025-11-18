import './bootstrap';

// const slide = document.querySelector('.gallery')
// let slides = document.querySelectorAll('.gal-img')
// const leftIcon = document.querySelector('.fa-chevron-left')
// const rightIcon = document.querySelector('.fa-chevron-right')
// let index = 0
// let interval = 2000

// // CREATING A CLONE ON THE FIRST AND LAST SLIDES
// const firstNode = slides[0].cloneNode(true)
// const lastNode = slides[slides.length - 1].cloneNode(true) 

// firstNode.id = 'first-nodeId'
// lastNode.id = 'last-nodeId' 

// slide.append(firstNode)
// slide.prepend(lastNode)

// // THIS GETS THE WIDTH OF EACH SLIDE
// const slideWidth = slides[index].clientWidth;
// slide.style.transform = `translate(${-slideWidth * index}px)`


// // CREATING A FUNCTION WHICH STARTS THE SLIDE AND SET INTERVAL FOR EACH SLIDE USING THE DEFINE INTERVAL
// function startSlide(){
// 	setInterval(()=>{ 
// 		index++
// 		if (index === slides.length) {
// 			index = 0
// 		}
//         slide.style.transform = `translate(${-slideWidth * index}px)`
//         slide.style.transition = '.8s'
// 	}, interval)
// }

// // GETTING  THE END OF EACH TRANSITION 
// // TO RESTART SLIDES WITHOUT GOING BACK TO THE FIRST SLIDE

// slide.addEventListener('transitionend', ()=>{
// 	slides = document.querySelectorAll('.gal-img')
// 	if (slides[index].id === firstNode.id) {
// 		slide.style.transition = 'none'	
// 		index = 1
//         slide.style.transform = `translate(${-slideWidth * index}px)`
//         // slide.style.transition = 'none'		
// 	}

// 	if (slides[index].id === lastNode.id) {
// 		slide.style.transition = 'none'
// 		index = slides.length - 2 
// 		slide.style.transform = `translate(${- slideWidth * index}px)`		
// 	}	

// })

// rightIcon.addEventListener('click', ()=>{
// 	    slides = document.querySelectorAll('.gal-img')
// 	    if (index >= slides.length - 1) return
// 		index++
//         slide.style.transform = `translate(${-slideWidth * index}px)`
//         slide.style.transition = '.8s'	
// })

// leftIcon.addEventListener('click', () =>{
// 	slides  = document.querySelectorAll('.gal-img')
// 	if (index <= 0) return
// 		index--
// 		slide.style.transform = `translate(${- slideWidth * index}px)`
// 		slide.style.transition = '.6s'		
// })	


// startSlide()



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
banner.style.transform = `translate(${-clientWidth * index}px)`;

const startSlide = () => {
    setInterval(()=>{
        index++;
        if(index === slide.length){
            index = 0;
        }
        banner.style.transform = `translate(${-clientWidth * index}px)`;
        banner.style.transition = '0.8s'
    }, interval);
}

        banner.addEventListener('transitionend', ()=>{
            slide = document.querySelectorAll('.slide')
        if (slide[index].id === firstNode.id) {
            banner.style.transition = 'none'
            index = 1;
            banner.style.transform = `translate(${-clientWidth * index}px)`  
        }

        if(slide[index].id === secondNode.id){
           banner.style.transition = 'none'
           index = slide.length - 2;
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

 




