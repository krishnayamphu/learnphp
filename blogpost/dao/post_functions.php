<?php
function getPosts(mysqli $conn): array
{
    $sql = "SELECT * FROM posts";
    $result = mysqli_query($conn, $sql);

    $posts = [];

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $posts[] = $row;
        }
    }
    return $posts;
}

function getRecentPosts(mysqli $conn, int $limit): array
{
    $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $limit";
    $result = mysqli_query($conn, $sql);

    $posts = [];

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $posts[] = $row;
        }
    }
    return $posts;
}

function getPostsByCategory(mysqli $conn, int $categoryId): array
{
    $sql = "SELECT * FROM posts WHERE category_id = $categoryId";
    $result = mysqli_query($conn, $sql);

    $posts = [];

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $posts[] = $row;
        }
    }
    return $posts;
}

function getPost(mysqli $conn, int $id): ?array
{
    $sql = "SELECT * FROM posts WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        return mysqli_fetch_assoc($result);
    }
    return null;
}

function createPost(
    mysqli $conn,
    string $title,
    string $slug,
    string $content,
    string $thumbnail,
    int $categoryId
): bool {
    $sql = "INSERT INTO posts (title, slug, content, thumbnail, category_id)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        return false;
    }

    mysqli_stmt_bind_param(
        $stmt,
        "ssssi",
        $title,
        $slug,
        $content,
        $thumbnail,
        $categoryId
    );

    $success = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    return $success;
}




function updatePost(
    mysqli $conn,
    int $id,
    string $title,
    string $slug,
    string $content,
    ?string $thumbnail,
    int $categoryId
): bool {

    if ($thumbnail === null) {
        $sql = "UPDATE posts
                SET title = ?, slug = ?, content = ?, category_id = ?
                WHERE id = ? LIMIT 1";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssii", $title, $slug, $content, $categoryId, $id);
    } else {
        $sql = "UPDATE posts
                SET title = ?, slug = ?, content = ?, thumbnail = ?, category_id = ?
                WHERE id = ? LIMIT 1";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssii", $title, $slug, $content, $thumbnail, $categoryId, $id);
    }

    $success = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $success;
}



function deletePost(mysqli $conn, int $id): bool
{
    $sql = "DELETE FROM posts WHERE id = $id";
    return mysqli_query($conn, $sql) === true;
}
