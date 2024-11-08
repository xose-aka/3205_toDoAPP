import React from 'react';
import { InertiaLink } from '@inertiajs/inertia-react';

interface AppLayoutProps {
    children: React.ReactNode;
}

const AppLayout: React.FC<AppLayoutProps> = ({ children }) => {
    return (
        <div className="min-h-screen flex flex-col">
            {/* Navbar */}
            <nav className="bg-blue-600 text-white p-4">
                <InertiaLink href="/" className="mr-4">Home</InertiaLink>
                <InertiaLink href="/about">About</InertiaLink>
            </nav>

            {/* Main content */}
            <main className="flex-1 p-4">
                {children}
            </main>

            {/* Footer */}
            <footer className="bg-gray-800 text-white p-4 text-center">
                © 2024 My Application
            </footer>
        </div>
    );
};

export default AppLayout;
