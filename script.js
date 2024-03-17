document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("add-review-form");
    const reviewsContainer = document.querySelector(".reviews-container");

    form.addEventListener("submit", function(event) {
        event.preventDefault();

        const username = form.username.value;
        const rating = form.rating.value;
        const comment = form.comment.value;

        const review = document.createElement("div");
        review.classList.add("review");
        review.innerHTML = `
            <h3>${username}</h3>
            <div class="stars">${"★".repeat(rating)}</div>
            <p>${comment}</p>
        `;

        reviewsContainer.appendChild(review);

        form.reset();
    });
});
