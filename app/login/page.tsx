import Link from 'next/link'
import React from 'react'

function page() {
  return (
    <div className="min-h-screen flex items-center justify-center w-full dark:bg-gray-950">
      <div className="bg-white dark:bg-gray-900 shadow-md rounded-lg px-8 py-6 max-w-md">
        <h1 className="text-2xl font-bold text-center mb-4 dark:text-gray-200">ยินดีต้อนรับสู่ครอบครัว PermSap</h1>
        <form action="#">
          <div className="mb-4">
            <label htmlFor="tel" className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">เบอร์โทรศัพท์</label>
            <input type="text" id="tel" 
              className="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
              placeholder="your@email.com" 
              minLength={9}
              maxLength={10}
              required 
            />
          </div>
          <div className="mb-4">
            <label htmlFor="password" className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">รหัสผ่าน</label>
            <input type="password" id="password" className="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter your password" required />
          </div>
          <div className="flex items-center justify-between mb-4">
            <div className="flex items-center">
            </div>
            <Link href="/register" className="text-xs text-indigo-500 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              สมัครสมาชิก
            </Link>
          </div>
          <button type="submit" className="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            เข้าสู่ระบบ
          </button>
        </form>
      </div>
    </div>
  )
}

export default page