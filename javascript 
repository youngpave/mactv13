function changeChannel(url) {
    const playerContainer = document.getElementById('playerContainer');
    playerContainer.innerHTML = ''; 
    
    const iframe = document.createElement('iframe');
    iframe.id = 'videoPlayer';
    iframe.src = url;
    iframe.width = '100%';
    iframe.height = '100%';
    iframe.style.border = '0';
    iframe.setAttribute('allowfullscreen', '');
    iframe.setAttribute('allow', 'autoplay; encrypted-media');
    iframe.setAttribute('sandbox', 'allow-scripts allow-same-origin allow-forms allow-presentation allow-top-navigation');
    
    playerContainer.appendChild(iframe);
}
