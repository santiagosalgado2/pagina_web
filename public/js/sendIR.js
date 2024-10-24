function enviarIR(signal, ip) {
    // Crea un cuerpo de la solicitud con las dos señales
    const data = new URLSearchParams();
    data.append('signal', signal);
    data.append('ip', ip);

    // Realiza la solicitud fetch al controlador en CodeIgniter
    fetch('http://localhost/pagina_web/pagina_web/public/sendIR', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: data
    })
    
}

function enviarHex(signal,protocol,bits,ip){
const data = new URLSearchParams();
    data.append('signal', signal);
    data.append('protocol', protocol);
    data.append('bits', bits);
    data.append('ip', ip);
    fetch('http://localhost/pagina_web/pagina_web/public/sendIR', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: data
    })

}