// resources/js/Pages/Index.tsx
import React from 'react';
import { Inertia } from '@inertiajs/inertia';
import AppLayout from "../../Layouts/AppLayout";

interface Todo {
    id: number;
    title: string;
    description: string;
    isCompleted: boolean;
    createdAt: string;
    updatedAt: string;
}

interface Props {
    todos: Todo[];
}

const Index: React.FC<Props> = ({ todos }) => {
    console.log(todos)
    return (
        <AppLayout>
            <div>
                <h1 className="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl ">
                    ToDo List</h1>
                <hr className="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700"/>
                <div className="grid grid-cols-4 gap-4">
                        {todos.map(todo => (

                            <div key={todo.id} className="max-w-sm rounded overflow-hidden shadow-lg">
                                <div className="px-6 py-4">
                                    <div className="font-bold text-xl mb-2">
                                        {todo.title}
                                    </div>
                                    <p className="text-gray-700 text-base">
                                        {todo.description}
                                    </p>
                                </div>
                                <div className="px-6 pt-4 pb-2">
                                <span
                                    className="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    Created at: { todo.createdAt }
                                </span>
                                    <span
                                        className="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                        Updated at: { todo.updatedAt }
                                    </span>

                                </div>
                            </div>

                            // <div
                            //     className="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                            //     <h5 className="mb-2 text-3xl font-bold text-gray-900 dark:text-white">
                            //         {todo.title}
                            //     </h5>
                            //     <p className="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">
                            //         {todo.description}
                            //     </p>
                            // </div>

                        ))}
                </div>
            </div>
        </AppLayout>
    );
};

export default Index;
