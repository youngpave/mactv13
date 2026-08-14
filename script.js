function changeChannel(url) {
    const playerContainer = document.getElementById('playerContainer');
    playerContainer.innerHTML = ''; 
    
    const iframe = document.createElement('iframe');
    iframe.id = 'videoPlayer';
    iframe.src = url;
    iframe.width = '100%';
    iframe.height = '100%';
    iframe.style.border = '0';
    
    iframe.setAttribute('allowfullscreen', 'true');
    iframe.setAttribute('allow', 'autoplay; fullscreen; encrypted-media; picture-in-picture');
    iframe.setAttribute('loading', 'eager');
    iframe.setAttribute('sandbox', 'allow-scripts allow-same-origin allow-forms allow-presentation allow-top-navigation-by-user-activation');
    
    playerContainer.appendChild(iframe);
}
