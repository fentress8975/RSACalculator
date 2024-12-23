const errors_p = {
    error_EulAndN: document.getElementsByClassName("EulAndN-error")[0],
    error_e: document.getElementsByClassName("e-error")[0],
    error_d: document.getElementsByClassName("d-error")[0],
    error_cAndM: document.getElementsByClassName("cAndM-error")[0],
};

function clearField() {
    const inputs = [];
    inputs.push(document.getElementById("p"),
        document.getElementById("q"),
        document.getElementById("n"),
        document.getElementById("eul"),
        document.getElementById("e"),
        document.getElementById("d"),
        document.getElementById("c"),
        document.getElementById("m")
    );

    inputs.forEach(element => {
        element.value = '';
    });
    clearErrors();
}

async function calculateEulAndN() {
    clearErrors();
    const p = document.getElementById("p");
    const q = document.getElementById("q");
    const n = document.getElementById("n");
    const eul = document.getElementById("eul");
    const url = "http://localhost/calculateEulAndN" + "?" + new URLSearchParams({ p: p.value, q: q.value });
    const data = await getData(url);
    if (Object.keys(data).includes("error")) {
        showError(data, errors_p.error_EulAndN);
    }
    else {
        eul.value = data.eul;
        n.value = data.n;
    }

}

async function calculateE() {
    clearErrors();
    const eul = document.getElementById("eul");
    const e = document.getElementById("e");
    const url = "http://localhost/calculateE" + "?" + new URLSearchParams({ eul: eul.value });
    const data = await getData(url);

    if (Object.keys(data).includes("error")) {
        showError(data, errors_p.error_e);
    }
    else {
        e.value = data.e;
    }
}

async function calculateD() {
    clearErrors();
    const eul = document.getElementById("eul");
    const e = document.getElementById("e");
    const d = document.getElementById("d");
    const url = "http://localhost/calculateD" + "?" + new URLSearchParams({ eul: eul.value, e: e.value });
    const data = await getData(url);
    if (Object.keys(data).includes("error")) {
        showError(data, errors_p.error_d);
    }
    else {
        d.value = data.d;
    }
}

async function encryptM() {
    clearErrors();
    const c = document.getElementById("c");
    const m = document.getElementById("m");
    const e = document.getElementById("e");
    const n = document.getElementById("n");
    const url = "http://localhost/encryptM" + "?" + new URLSearchParams({ m: m.value, e: e.value, n: n.value });
    const data = await getData(url);
    if (Object.keys(data).includes("error")) {
        showError(data, errors_p.error_cAndM);
    }
    else {
        c.value = data.c;
    }
}

async function decryptC() {
    clearErrors();
    const c = document.getElementById("c");
    const m = document.getElementById("m");
    const d = document.getElementById("d");
    const n = document.getElementById("n");
    const url = "http://localhost/decryptC" + "?" + new URLSearchParams({ c: c.value, d: d.value, n: n.value });
    const data = await getData(url);
    if (Object.keys(data).includes("error")) {
        showError(data, errors_p.error_cAndM);
    }
    else {
        m.value = data.m;
    }
}

async function getData(url) {
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`Response status: ${response.status}`);
        }

        const result = await response.json();
        return result;
    } catch (error) {
        console.error(error.message);
    }
}

function showError(data, p) {
    clearErrors();
    p.innerText = data.error;
}

function clearErrors() {
    for (const [key, value] of Object.entries(errors_p)) {
        value.innerText = '';
    }
}
