window.addEventListener('load', function() {
    const img1 = document.querySelector('.banner1 .img1');
    const img2 = document.querySelector('.banner1 .img2');
    
    img1.classList.add('animate');
    img2.classList.add('animate');
});

document.addEventListener('scroll', function() {
    const banner = document.querySelector('.banner2');
    const bannerPosition = banner.getBoundingClientRect().top;
    const screenPosition = window.innerHeight;

    if (bannerPosition < screenPosition) {
        banner.classList.add('active');
    }
});

document.addEventListener('scroll', function() {
    const banner = document.querySelector('.banner3');
    const bannerPosition = banner.getBoundingClientRect().top;
    const screenPosition = window.innerHeight;

    if (bannerPosition < screenPosition) {
        banner.classList.add('active');
    }
});

window.addEventListener('load', function() {
    const bannersale = document.querySelector('.banner-sale');
    const menuproduct = document.querySelector('.menu-product');
    const listproducts = document.querySelector('.list-products');
    
    bannersale.classList.add('animate');
    menuproduct.classList.add('animate');
    listproducts.classList.add('animate');
});
