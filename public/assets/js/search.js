$(document).ready(function () {
    $("#search-wikis").hide();
    $(".search-form").keyup(function () {
      var input = $("#search-field").val();

        if (input !== "") {
            $("#search-wikis").show();
            $("#main-page").hide();
            // alert(input);
            const fetchUrl = "http://localhost/Wiki/public/wiki/search_wiki";
            $.ajax({
                url: fetchUrl,
                type: "post",
                data: {
                    'input': input,
                },
                success: function (response) {
                    let wikis = "";
                    let responseJson = $.parseJSON(response);
                    console.log(responseJson);
                    if (responseJson.length !== 0) {
                        responseJson.forEach((element) => {
                          wikis += `
                        <div class=" cursor-pointer border border-beige p-4 rounded-lg overflow-hidden group shadow-xl">
                <h1 class="text-mr text-xl font-bold font-serif pb-2">${
                  element.title
                }</h1>
                <p class="truncate">${element.content}</p>

                <div class="py-2">
                    <span class="text-sm block text-gray-400 mb-2">${new Date(
                      element.dateCreation
                    ).toDateString()} | BY ${element.firstname} ${
                            element.lastname
                          }</span>
                    <h3 class="text-xl font-bold text-[#333] group-hover:text-moinbeige transition-all"><?= $w['name'] ?></h3>
                </div>
                <div class="flex items-center  mt-2">
                    <a href="http://localhost/Wiki/public/wiki/signlepage/${
                      element.idwiki
                    }" class="  mr-2 ">
                            <div class="flex">
                                <p class="text-moinbeige underline">Read more</p>
                                </div>
                            </a>
                </div>
            </div>
                        `;
                        });
                    } else {
                        wikis += `<p class="text-2xl font-medium text-[#333] capitalize">
                        No Wiki found with: ${input}</p>`;
                    }
                    $("#search-wikis").html(wikis);
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching wikis:", status, error);
                },
            });
        } else {
            $("#search-wikis").hide();
            $("#main-page").show();
        }
    });

})