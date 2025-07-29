{{-- filepath: d:\dev\breast-cancer-web\resources\views\partials\article-styles.blade.php --}}

<style>
    /* RESET PROSE CONFLICTS */
    .article-content.prose ul,
    .article-content.prose ol {
        all: unset;
    }

    /* Custom styles untuk content dari RichEditor */
    .article-content {
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        line-height: 1.7;
        max-width: none !important;
    }

    /* STYLING UNTUK LISTS - PENTING! */
    .article-content ul {
        list-style-type: disc !important;
        padding-left: 2rem !important;
        margin: 1.5rem 0 !important;
        display: block !important;
    }

    .article-content ol {
        list-style-type: decimal !important;
        padding-left: 2rem !important;
        margin: 1.5rem 0 !important;
        display: block !important;
    }

    .article-content li {
        display: list-item !important;
        color: #374151 !important;
        line-height: 1.6 !important;
        margin-bottom: 0.5rem !important;
        padding-left: 0.5rem !important;
    }

    /* Nested lists */
    .article-content ul ul {
        list-style-type: circle !important;
        margin: 0.5rem 0 !important;
        padding-left: 1.5rem !important;
    }

    .article-content ol ol {
        list-style-type: lower-alpha !important;
        margin: 0.5rem 0 !important;
        padding-left: 1.5rem !important;
    }

    .article-content ul ol {
        list-style-type: decimal !important;
        margin: 0.5rem 0 !important;
        padding-left: 1.5rem !important;
    }

    .article-content ol ul {
        list-style-type: circle !important;
        margin: 0.5rem 0 !important;
        padding-left: 1.5rem !important;
    }

    /* Styling untuk paragraf */
    .article-content p {
        color: #374151 !important;
        line-height: 1.7 !important;
        margin-bottom: 1.25rem !important;
        text-align: justify;
    }

    /* Styling untuk headings */
    .article-content h1 {
        font-size: 2rem !important;
        font-weight: 700 !important;
        color: #111827 !important;
        margin: 2rem 0 1.5rem 0 !important;
        border-bottom: 2px solid #3b82f6 !important;
        padding-bottom: 0.75rem !important;
    }

    .article-content h2 {
        font-size: 1.5rem !important;
        font-weight: 600 !important;
        color: #1f2937 !important;
        margin: 1.5rem 0 1rem 0 !important;
        border-left: 4px solid #3b82f6 !important;
        padding-left: 1rem !important;
        background-color: #eff6ff !important;
        padding-top: 0.5rem !important;
        padding-bottom: 0.5rem !important;
    }

    .article-content h3 {
        font-size: 1.25rem !important;
        font-weight: 600 !important;
        color: #1f2937 !important;
        margin: 1.25rem 0 0.75rem 0 !important;
        border-left: 4px solid #10b981 !important;
        padding-left: 1rem !important;
    }

    /* Styling untuk blockquotes */
    .article-content blockquote {
        border-left: 4px solid #60a5fa !important;
        padding-left: 1rem !important;
        font-style: italic !important;
        background-color: #eff6ff !important;
        padding: 1rem !important;
        margin: 1rem 0 !important;
        border-radius: 0 0.5rem 0.5rem 0 !important;
    }

    /* Styling untuk links */
    .article-content a {
        color: #2563eb !important;
        text-decoration: underline !important;
        text-underline-offset: 2px !important;
    }

    .article-content a:hover {
        color: #1d4ed8 !important;
        text-decoration-thickness: 2px !important;
    }

    /* Styling untuk strong/bold */
    .article-content strong {
        font-weight: 600 !important;
        color: #111827 !important;
    }

    /* Styling untuk emphasis/italic */
    .article-content em {
        font-style: italic !important;
        color: #4b5563 !important;
    }

    /* Styling untuk strikethrough */
    .article-content s,
    .article-content del {
        text-decoration: line-through !important;
        color: #6b7280 !important;
    }

    /* Styling untuk gambar */
    .article-content img {
        max-width: 100% !important;
        height: auto !important;
        border-radius: 0.5rem !important;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1) !important;
        margin: 1.5rem auto !important;
        display: block !important;
        border: 1px solid #e5e7eb !important;
    }

    /* Code blocks */
    .article-content pre {
        background-color: #1f2937 !important;
        color: #f9fafb !important;
        padding: 1rem !important;
        border-radius: 0.5rem !important;
        overflow-x: auto !important;
        margin: 1rem 0 !important;
    }

    .article-content code {
        background-color: #f3f4f6 !important;
        color: #1f2937 !important;
        padding: 0.25rem 0.5rem !important;
        border-radius: 0.25rem !important;
        font-size: 0.875rem !important;
    }

    /* Responsive design */
    @media (max-width: 768px) {

        .article-content ul,
        .article-content ol {
            padding-left: 1.5rem !important;
        }

        .article-content img {
            margin: 1rem auto !important;
        }

        .article-content h1 {
            font-size: 1.5rem !important;
        }

        .article-content h2 {
            font-size: 1.25rem !important;
        }

        .article-content h3 {
            font-size: 1.125rem !important;
        }
    }

    /* Print styles */
    @media print {

        .article-content,
        .article-content *,
        .article-content ul,
        .article-content ol,
        .article-content li {
            color: black !important;
        }

        .article-content ul,
        .article-content ol {
            list-style-position: outside !important;
        }
    }
</style>
