<?php
function e($value): string { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function redirect(string $url): never { header("Location: $url"); exit; }
function flash(string $message, string $type='success'): void { $_SESSION['flash']=['message'=>$message,'type'=>$type]; }
function getFlash(): ?array { $f=$_SESSION['flash']??null; unset($_SESSION['flash']); return $f; }
