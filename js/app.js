Reveal.initialize({
    dependencies: [
        { src: 'js/prism.js', async: true }
    ],
    hash: true,
    slideNumber: true,
    mouseWheel: false,
    history: true,
    overview: false
});

/**
 * @link https://github.com/hakimel/reveal.js/issues/806#issuecomment-222417787
 */
Reveal.addEventListener( 'ready', event => {
    const $headerTitle = document.createElement('h2'),
        $headerSubtitle = document.createElement('p'),
        $header = document.createElement('div');
    $header.classList.add('slide-title');
    $header.appendChild($headerTitle);
    $header.appendChild($headerSubtitle);
    document.querySelector('div.reveal').appendChild($header);

    const changeHeader = (slide) => {
        if (typeof slide.dataset.noTitle == 'undefined') {
            $header.style.display = 'none';
            return;
        }

        $header.style.display = 'block';

        let title = (typeof slide.dataset.titleDefault == 'undefined')
            ? slide.dataset.title
            : "Criando APIs seguras";

        let subtitle = (typeof slide.dataset.titleDefault == 'undefined')
            ? slide.dataset.subtitle
            : "@vcampitelli";

        if (typeof title != 'undefined') {
            $headerTitle.innerText = title;
        }

        if (typeof subtitle != 'undefined') {
            $headerSubtitle.innerText = subtitle;
        }
    };

    changeHeader(event.currentSlide);

    Reveal.on( 'slidechanged', event => {
        changeHeader(event.currentSlide);
    });

    // @see https://stackoverflow.com/a/26893663
    const element = document.querySelector('.slides'),
        scaleX = element.getBoundingClientRect().width / element.offsetWidth,
        scaleY = element.getBoundingClientRect().height / element.offsetHeight;
    document.querySelectorAll('img[data-width]').forEach(node => {
        node.style.width = (node.dataset.width / scaleX) + 'px';
    });
    document.querySelectorAll('img[data-height]').forEach(node => {
        node.style.height = (node.dataset.height / scaleY) + 'px';
    });
});
