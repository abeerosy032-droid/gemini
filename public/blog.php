<?php
// Blog eval router - serves the blog Laravel app
// This is a standalone file that connects to the blog database

$db = new PDO('sqlite:' . realpath(__DIR__ . '/../../../../blog-eval/database/database.sqlite'));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$path = $_GET['route'] ?? '/';

// Fetch published posts
$stmt = $db->query("
    SELECT p.*, u.name as author 
    FROM posts p 
    JOIN users u ON p.user_id = u.id 
    WHERE p.status = 'published' AND p.published_at <= datetime('now')
    ORDER BY p.published_at DESC
");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch tags
$tags = $db->query("SELECT t.*, COUNT(pt.post_id) as posts_count FROM tags t LEFT JOIN post_tag pt ON t.id = pt.tag_id GROUP BY t.id")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المدونة — تقييم GLM-5.1</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Nav -->
    <nav class="bg-white shadow-sm border-b">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="/blog.php" class="text-xl font-bold text-indigo-600">📝 المدونة</a>
            <div class="flex items-center gap-4">
                <a href="/blog.php?page=login" class="text-sm text-indigo-600 hover:text-indigo-800">تسجيل دخول</a>
                <a href="/project1-viewer.html" class="text-sm text-gray-500 hover:text-gray-700">📁 الكود</a>
                <a href="/eval.html" class="text-sm text-gray-500 hover:text-gray-700">📊 التقييم</a>
            </div>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="mb-6 bg-indigo-50 border border-indigo-200 rounded-xl p-4">
            <p class="text-indigo-800 text-sm">🧠 <strong>مشروع تقييم GLM-5.1</strong> — هذا الموقع يعمل بقاعدة بيانات حقيقية مع 5 مقالات و 6 وسوم و 2 مستخدمين</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar -->
            <aside class="lg:w-64 shrink-0">
                <div class="bg-white rounded-xl shadow-sm border p-4">
                    <h3 class="font-bold text-gray-700 mb-3">الوسوم</h3>
                    <div class="flex flex-wrap gap-2">
                        <?php foreach($tags as $tag): ?>
                            <a href="/blog.php?tag=<?= urlencode($tag['slug']) ?>"
                               class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700 hover:bg-indigo-100 transition">
                                <?= htmlspecialchars($tag['name']) ?>
                                <span class="mr-1 text-[10px] opacity-60">(<?= $tag['posts_count'] ?>)</span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border p-4 mt-4">
                    <h3 class="font-bold text-gray-700 mb-3">🔐 حسابات تجريبية</h3>
                    <div class="space-y-3 text-sm">
                        <div class="p-2 bg-green-50 rounded-lg">
                            <p class="font-medium text-green-800">👑 أدمن</p>
                            <p class="text-green-600 text-xs">admin@blog.test</p>
                            <p class="text-green-600 text-xs">password</p>
                        </div>
                        <div class="p-2 bg-blue-50 rounded-lg">
                            <p class="font-medium text-blue-800">✏️ محرر</p>
                            <p class="text-blue-600 text-xs">editor@blog.test</p>
                            <p class="text-blue-600 text-xs">password</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border p-4 mt-4">
                    <h3 class="font-bold text-gray-700 mb-3">📊 إحصائيات</h3>
                    <div class="space-y-2 text-sm text-gray-600">
                        <?php
                        $totalPosts = $db->query("SELECT COUNT(*) FROM posts")->fetchColumn();
                        $published = $db->query("SELECT COUNT(*) FROM posts WHERE status='published'")->fetchColumn();
                        $drafts = $db->query("SELECT COUNT(*) FROM posts WHERE status='draft'")->fetchColumn();
                        ?>
                        <p>📝 إجمالي المقالات: <strong><?= $totalPosts ?></strong></p>
                        <p>✅ منشورة: <strong><?= $published ?></strong></p>
                        <p>📝 مسودات: <strong><?= $drafts ?></strong></p>
                        <p>🏷️ وسوم: <strong><?= count($tags) ?></strong></p>
                    </div>
                </div>
            </aside>

            <!-- Posts -->
            <div class="flex-1">
                <?php if(empty($posts)): ?>
                    <div class="text-center py-20 text-gray-400">
                        <p class="text-4xl mb-4">📭</p>
                        <p>لا توجد مقالات</p>
                    </div>
                <?php else: ?>
                    <div class="grid gap-6 md:grid-cols-2">
                        <?php foreach($posts as $post):
                            // Get tags for this post
                            $stmt = $db->prepare("SELECT t.* FROM tags t JOIN post_tag pt ON t.id = pt.tag_id WHERE pt.post_id = ?");
                            $stmt->execute([$post['id']]);
                            $postTags = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                            <article class="bg-white rounded-xl shadow-sm border overflow-hidden hover:shadow-md transition-shadow">
                                <div class="p-5">
                                    <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
                                        <span><?= htmlspecialchars($post['author']) ?></span>
                                        <span>•</span>
                                        <time><?= date('d M Y', strtotime($post['published_at'])) ?></time>
                                        <span class="px-2 py-0.5 rounded-full text-[10px] bg-green-100 text-green-700">منشور</span>
                                    </div>

                                    <h2 class="text-lg font-bold text-gray-900 mb-2"><?= htmlspecialchars($post['title']) ?></h2>
                                    <p class="text-sm text-gray-600 leading-relaxed mb-4"><?= htmlspecialchars(mb_substr(strip_tags($post['body']), 0, 150)) ?>...</p>

                                    <?php if($postTags): ?>
                                        <div class="flex flex-wrap gap-2">
                                            <?php foreach($postTags as $pt): ?>
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700">
                                                    <?= htmlspecialchars($pt['name']) ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <footer class="border-t mt-16 py-6 text-center text-sm text-gray-400">
        <p>🧠 تقييم GLM-5.1 — المشروع 1: منظومة نشر مقالات</p>
    </footer>
</body>
</html>
