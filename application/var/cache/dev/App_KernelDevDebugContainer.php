<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerAH1qgB6\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerAH1qgB6/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerAH1qgB6.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerAH1qgB6\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerAH1qgB6\App_KernelDevDebugContainer([
    'container.build_hash' => 'AH1qgB6',
    'container.build_id' => '48a13c8d',
    'container.build_time' => 1699714981,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerAH1qgB6');
