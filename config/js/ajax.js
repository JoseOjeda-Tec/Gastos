function ajax(type, url, fn = () => {}, dataJson) {
    
    var xhr = new XMLHttpRequest();

    xhr.open(type, url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onload = () => {
        if (xhr.status >= 200 && xhr.status < 300) {
            
            fn(xhr);

        } else { 
            console.error('Error en la petición:', xhr.statusText); 
        }
    };

    xhr.onerror = () => {  console.error('Error de red'); };

    var data = JSON.stringify(dataJson);
    xhr.send(data);

}