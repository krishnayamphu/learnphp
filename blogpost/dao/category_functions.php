<?php
function getCategories(mysqli $conn): array
{
    $sql = "SELECT * FROM category";
    $result = mysqli_query($conn, $sql);

    $categories = [];

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }
    }
    return $categories;
}



function getCategory(mysqli $conn, int $id): ?array
{
    $sql = "SELECT * FROM category WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        return mysqli_fetch_assoc($result);
    }
    return null;
}

function getCategoryByName(mysqli $conn, string $name): ?array
{
    $sql = "SELECT * FROM category WHERE name = '$name' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        return mysqli_fetch_assoc($result);
    }
    return null;
}

function getLimitCategories(mysqli $conn, int $limit): array
{
    $sql = "SELECT * FROM category ORDER BY id DESC LIMIT $limit";
    $result = mysqli_query($conn, $sql);

    $categories = [];

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }
    }
    return $categories;
}

function createCategory(mysqli $conn, string $name, string $slug, string $description): bool
{
    $name = mysqli_real_escape_string($conn, $name);
    $slug = mysqli_real_escape_string($conn, $slug);
    $description = mysqli_real_escape_string($conn, $description);
    $sql = "INSERT INTO category (name, slug,description) VALUES ('$name', '$slug', '$description')";

    return mysqli_query($conn, $sql) === true;
}



function updateCategory(mysqli $conn, int $id, string $name, string $slug, string $description): bool
{
    $name = mysqli_real_escape_string($conn, $name);
    $slug = mysqli_real_escape_string($conn, $slug);
    $description = mysqli_real_escape_string($conn, $description);

    $sql = "UPDATE category 
            SET name = '$name', slug = '$slug', description = '$description'
            WHERE id = $id";

    return mysqli_query($conn, $sql) === true;
}

function deleteCategory(mysqli $conn, int $id): bool
{
    $sql = "DELETE FROM category WHERE id = $id";
    return mysqli_query($conn, $sql) === true;
}
