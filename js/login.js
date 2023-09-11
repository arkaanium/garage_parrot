function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
async function onSubmit(token) {
    document.getElementById('submitBtn').style.visibility = 'hidden'
    await sleep(500);
    document.getElementById("loginForm").submit();
}