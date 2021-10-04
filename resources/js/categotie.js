const search = async () => {
    const nom = $("#search").val();
    const level = $("#select").val();
    const { data } = await axios.get("/categorie/fetch", {
        params: {
            nom,
            level,
        },
    });
    $("#table").html("");
    $("#table").html(data);
};

const del = (id) => {
    axios.delete(`/categorie/delete/${id}`);
    location.reload();
};
