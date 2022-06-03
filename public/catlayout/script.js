const sectionsContainer = document.querySelector('.page-sections');
const sections = document.querySelectorAll('.page-section');
const nav = document.querySelector('.nav-sections');
const menu = nav.querySelector('.menu');
const links = nav.querySelectorAll('.menu-item-link');
const activeLine = nav.querySelector('.active-line');
const sectionOffset = nav.offsetHeight + 24;
const activeClass = 'active';
let activeIndex = 0;
let isScrolling = true;
let userScroll = true;

const setActiveClass = () => {
  links[activeIndex].classList.add(activeClass);
};

const removeActiveClass = () => {
  links[activeIndex].classList.remove(activeClass);
};

const moveActiveLine = () => {
  const link = links[activeIndex];
  const linkX = link.getBoundingClientRect().x;
  const menuX = menu.getBoundingClientRect().x;

  activeLine.style.transform = `translateX(${menu.scrollLeft - menuX + linkX}px)`;
  activeLine.style.width = `${link.offsetWidth}px`;
};

const setMenuLeftPosition = position => {
  menu.scrollTo({
    left: position,
    behavior: 'smooth' });

};

const checkMenuOverflow = () => {
  const activeLink = links[activeIndex].getBoundingClientRect();
  const offset = 30;

  if (Math.floor(activeLink.right) > window.innerWidth) {
    setMenuLeftPosition(menu.scrollLeft + activeLink.right - window.innerWidth + offset);
  } else if (activeLink.left < 0) {
    setMenuLeftPosition(menu.scrollLeft + activeLink.left - offset);
  }
};

const handleActiveLinkUpdate = current => {
  removeActiveClass();
  activeIndex = current;
  checkMenuOverflow();
  setActiveClass();
  moveActiveLine();
};

const init = () => {
  moveActiveLine(links[0]);
  document.documentElement.style.setProperty('--section-offset', sectionOffset);
};

links.forEach((link, index) => link.addEventListener('click', () => {
  $(".page-sections").css({"top":"0px"});

  userScroll = false;
  handleActiveLinkUpdate(index);
}));

// window.addEventListener("wheel", (event) => {
//   console.log(event.deltaY);
//   const currentIndex = sectionsContainer.getBoundingClientRect().top < 0 ?
//   sections.length - 1 - [...sections].reverse().findIndex(section => window.scrollY >= section.offsetTop - sectionOffset * 2) :
//   0;
//   if(event.deltaY < 0){
//     console.log("on wheel up "+currentIndex);
//     if(currentIndex == 0){
//   $(".page-sections").css({"top":"65px"});
//   console.log(currentIndex);

// }

//   }else{
//     console.log("on wheel down "+currentIndex);

//   }

// });

window.addEventListener("scroll", (e) => {


  const currentIndex = sectionsContainer.getBoundingClientRect().top < 0 ?
  sections.length - 1 - [...sections].reverse().findIndex(section => window.scrollY >= section.offsetTop - sectionOffset * 2) :
  0;

  
  console.log(userScroll);

  if(window.scrollY < 106){
  if(currentIndex == 0){
  $(".page-sections").css({"top":"-25px"});
  // console.log(currentIndex);

}

}else{
  // if(window.scrollY > 106){
  if(userScroll == false){
  $(".page-sections").css({"top":"169px"});
  }
  // }
}

// if(currentIndex == 0){
//   $(".page-sections").css({"top":"65px"});
//   console.log(currentIndex);

// }else{
//   $(".page-sections").css({"top":"169px"});

// }

  if (userScroll && activeIndex !== currentIndex) {
    handleActiveLinkUpdate(currentIndex);
  } else {
    window.clearTimeout(isScrolling);
    isScrolling = setTimeout(() => userScroll = true, 100);
  }
});

init();