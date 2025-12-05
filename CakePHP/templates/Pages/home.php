<!-- File: templates/Pages/home.php -->

<div class="welcome-section">
    <h1>🍰 Bienvenido al CMS de Artículos</h1>
    <p class="subtitle">Sistema de Gestión de Contenidos desarrollado con CakePHP 4</p>
</div>

<div class="stats-section">
    <div class="stat-card">
        <div class="stat-number"><?= $totalArticles ?></div>
        <div class="stat-label">Artículos Totales</div>
    </div>
    <div class="stat-card">
        <div class="stat-number"><?= count($recentArticles) ?></div>
        <div class="stat-label">Artículos Recientes</div>
    </div>
</div>

<div class="quick-actions">
    <h2>Acciones Rápidas</h2>
    <div class="action-buttons">
        <?= $this->Html->link('📝 Ver Todos los Artículos', ['controller' => 'Articles', 'action' => 'index'], ['class' => 'btn btn-primary']) ?>
        <?= $this->Html->link('➕ Agregar Nuevo Artículo', ['controller' => 'Articles', 'action' => 'add'], ['class' => 'btn btn-success']) ?>
        <?= $this->Html->link('🏷️ Gestionar Etiquetas', ['controller' => 'Tags', 'action' => 'index'], ['class' => 'btn btn-secondary']) ?>
        <?= $this->Html->link('👥 Gestionar Usuarios', ['controller' => 'Users', 'action' => 'index'], ['class' => 'btn btn-secondary']) ?>
    </div>
</div>

<?php if (!empty($recentArticles)): ?>
<div class="recent-articles">
    <h2>📰 Artículos Recientes</h2>
    <div class="articles-grid">
        <?php foreach ($recentArticles as $article): ?>
        <div class="article-card">
            <h3>
                <?= $this->Html->link($article->title, ['controller' => 'Articles', 'action' => 'view', $article->slug]) ?>
            </h3>
            <p class="article-meta">
                <span>📅 <?= $article->created->i18nFormat('dd/MM/yyyy') ?></span>
                <?php if (!empty($article->tags)): ?>
                    <span class="tags">
                        <?php
                        $tagTitles = [];
                        foreach ($article->tags as $tag) {
                            $tagTitles[] = $tag->title;
                        }
                        echo '🏷️ ' . implode(', ', $tagTitles);
                        ?>
                    </span>
                <?php endif; ?>
            </p>
            <p class="article-excerpt">
                <?= $this->Text->truncate(strip_tags($article->body), 150, ['ellipsis' => '...', 'exact' => false]) ?>
            </p>
            <div class="article-actions">
                <?= $this->Html->link('Leer más →', ['controller' => 'Articles', 'action' => 'view', $article->slug], ['class' => 'read-more']) ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="view-all">
        <?= $this->Html->link('Ver todos los artículos →', ['controller' => 'Articles', 'action' => 'index'], ['class' => 'btn btn-secondary']) ?>
    </div>
</div>
<?php else: ?>
<div class="empty-state">
    <p>No hay artículos aún. <?= $this->Html->link('Crea el primero', ['controller' => 'Articles', 'action' => 'add']) ?></p>
</div>
<?php endif; ?>

<style>
.welcome-section {
    text-align: center;
    padding: 40px 20px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 10px;
    margin-bottom: 30px;
}

.welcome-section h1 {
    font-size: 42px;
    margin-bottom: 10px;
    color: white;
    border: none;
}

.subtitle {
    font-size: 18px;
    opacity: 0.9;
}

.stats-section {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.stat-card {
    flex: 1;
    min-width: 200px;
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    text-align: center;
    border: 2px solid #e9ecef;
}

.stat-number {
    font-size: 48px;
    font-weight: bold;
    color: #667eea;
    margin-bottom: 10px;
}

.stat-label {
    color: #6c757d;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.quick-actions {
    background: #f8f9fa;
    padding: 30px;
    border-radius: 10px;
    margin-bottom: 30px;
}

.quick-actions h2 {
    margin-bottom: 20px;
    color: #495057;
}

.action-buttons {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.btn-primary {
    background: #667eea;
}

.btn-success {
    background: #28a745;
}

.recent-articles {
    margin-top: 30px;
}

.recent-articles h2 {
    margin-bottom: 25px;
    color: #495057;
}

.articles-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.article-card {
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    border: 1px solid #e9ecef;
    transition: transform 0.3s, box-shadow 0.3s;
}

.article-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}

.article-card h3 {
    margin-bottom: 15px;
    font-size: 20px;
    color: #667eea;
}

.article-card h3 a {
    color: #667eea;
    text-decoration: none;
}

.article-card h3 a:hover {
    color: #764ba2;
    text-decoration: underline;
}

.article-meta {
    font-size: 13px;
    color: #6c757d;
    margin-bottom: 15px;
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.article-meta .tags {
    font-style: italic;
}

.article-excerpt {
    color: #495057;
    line-height: 1.6;
    margin-bottom: 15px;
}

.read-more {
    color: #667eea;
    font-weight: 600;
    text-decoration: none;
}

.read-more:hover {
    color: #764ba2;
    text-decoration: underline;
}

.view-all {
    text-align: center;
    margin-top: 20px;
}

.empty-state {
    text-align: center;
    padding: 60px 20px;
    background: #f8f9fa;
    border-radius: 10px;
    color: #6c757d;
}

.empty-state p {
    font-size: 18px;
}
</style>


