 var keyword = document.getElementById('keyword');
 var containerCari = document.getElementById('containerCari');
 

 keyword.addEventListener('keyup', function(){
    
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
        if ( xhr.readyState == 4 && xhr.status == 200) {
            containerCari.innerHTML = xhr.responseText;
        }
    }
    xhr.open('GET', 'user/cari-tempat.php?keyword=' + keyword.value, true);
    xhr.send();
})