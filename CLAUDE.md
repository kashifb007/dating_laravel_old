# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Development Commands

### Core Laravel Commands
- **Development server**: `composer run dev` (runs server, queue, logs, and Vite concurrently)
- **Testing**: `composer run test` (clears config and runs tests)
- **Code formatting**: `./vendor/bin/pint` (Laravel Pint for PHP)
- **Individual test**: `php artisan test --filter TestClassName`
- **Database migrations**: `php artisan migrate`
- **Queue processing**: `php artisan queue:listen --tries=1`
- **Clear cache**: `php artisan config:clear`

### Frontend Development
- **Asset compilation**: `npm run build`
- **Development watch**: `npm run dev`

## Architecture Overview

### Core Technology Stack
- **Laravel 12**: Main framework
- **Livewire 3.6+ with Volt**: For reactive components and SPA-like behavior
- **Livewire Flux Pro**: Premium UI components
- **Laravel Fortify**: Authentication with 2FA support
- **Laratrust**: Role-based access control (RBAC) system
- **Spatie Media Library**: File and image management
- **Spatie Translatable**: Multilingual content support
- **Pest**: Testing framework instead of PHPUnit

### Database Architecture
- **Primary Database**: SQLite for development (`database/database.sqlite`)
- **Sharded Likes System**: Custom sharding implementation for likes table using `useShard()` method in models
- **Polymorphic Relationships**: Used extensively (notifications, profile answers, media attachments)

### Key Models and Relationships
- **User**: Core authentication model with roles/permissions via Laratrust
- **Dating-Specific Models**: Like, View, Decline, Block, Message, Note
- **Profile System**: ProfileQuestion, ProfileChoice, ProfileAnswer with polymorphic relationships
- **Subscription System**: Plan, Subscription, Payment, Coupon models
- **Media Management**: Image model with Spatie Media Library integration
- **Notifications**: Polymorphic notification system for likes, views, messages

### Authentication & Authorization
- **Fortify Features**: Registration, password reset, 2FA, profile updates
- **Laratrust RBAC**: Role and permission system with User, Role, Permission models
- **Custom Home Route**: `/home` instead of `/dashboard` (configured in Fortify)

### Frontend Architecture
- **Livewire Components**: Located in `app/Livewire/` with corresponding Blade views in `resources/views/livewire/`
- **Volt**: Functional components for simpler Livewire components
- **Tailwind CSS**: Styling framework with custom configuration
- **Flux UI**: Premium component library integration

### Services Layer
- **LikeService**: Handles sharded like operations with async processing using Spatie Async
- **Service Pattern**: Business logic extracted from controllers into dedicated service classes

### Testing Strategy
- **Pest Framework**: Modern PHP testing with Feature and Unit test separation
- **Test Database**: In-memory SQLite for fast testing
- **Existing Tests**: Authentication flows, profile management, basic feature tests

### File Structure Patterns
- **Models**: Domain-driven organization in `app/Models/`
- **Services**: Business logic in `app/Services/`
- **Livewire**: Components in `app/Livewire/` with corresponding views
- **Migrations**: Chronological with descriptive names, includes Laratrust setup
- **Views**: Blade templates with component-based architecture

## Development Notes

### Database Sharding
The application implements custom database sharding for the likes system. The `Like` model uses a `useShard()` method that determines the appropriate shard based on member ID modulo the configured shard count.

### Multilingual Support
Uses Spatie Translatable package with a dedicated `LanguageLine` model for dynamic translations and language support.

### Media Handling
Spatie Media Library is configured for handling user images and file uploads with the `Image` model serving as a bridge.

### Async Processing
Utilizes Spatie Async for parallel database operations, particularly in the likes system for cross-shard queries.