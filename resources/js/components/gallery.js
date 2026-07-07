const mainImage = document.getElementById('mainImage');

document.querySelectorAll('.thumb').forEach(thumb => {

    thumb.addEventListener('click', () => {

        mainImage.src = thumb.src;

        document.querySelectorAll('.thumb')
            .forEach(item => item.classList.remove('active-thumb'));

        thumb.classList.add('active-thumb');

    });

});
